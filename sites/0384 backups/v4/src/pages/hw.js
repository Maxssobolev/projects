import React from 'react';
import axios from 'axios';
import { Markup } from 'interweave';
import { Link } from 'react-router-dom';
import moment from 'moment';
import 'moment/locale/ru';
import rope from '../assets/img/rope.png';
import fire from '../assets/img/fire.svg';

export default class HW extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      hw: [],
    };
  }
  componentDidMount() {
    const apiUrl = `/api/homework`;
    axios.get(apiUrl).then((resp) => {
      if (resp.data.length > 0) {
        this.setState({
          hw: resp.data,
        });
      }
    });
  }

  render() {
    return (
      <div className="page page-homework">
        {this.state.hw.map((res, index) => {
          let deadline = '';
          let wholeRopeWidth = '';
          let progress = '';
          let fromStartToNow = '';
          let publicDate = moment(res.date);
          let pubicDate_startPoint = moment(res.date);
          let color = 'rgb(125 199 125)';
          let leftTime = '';
          if (res.deadline !== '0000-00-00') {
            deadline = moment(res.deadline);
            wholeRopeWidth = deadline.diff(publicDate, 'hours');
            fromStartToNow = moment().diff(pubicDate_startPoint, 'hours');
            progress = (fromStartToNow / wholeRopeWidth) * 100;
            leftTime = wholeRopeWidth - fromStartToNow;
            if (100 - progress <= 65) {
              color = '#d8e061';
            }
            if (100 - progress <= 35) {
              color = '#ff958a';
            }
          }

          return (
            <div key={index}>
              {deadline && moment().isBefore(deadline) && (
                <div
                  title={`до сдачи осталось ${Math.floor(leftTime / 24)}д ${
                    leftTime - 24 * Math.floor(leftTime / 24)
                  }ч`}
                  style={{
                    marginTop: '25px',
                    width: progress ? 100 - progress + '%' : 0,
                    background: color,
                    height: '5px',
                    position: 'relative',
                  }}>
                  <img
                    src={fire}
                    width="25"
                    style={{
                      opacity: 0.8,
                      position: 'absolute',
                      right: '-6px',
                      top: '-18px',
                    }}
                  />
                </div>
              )}
              <Link
                to={{
                  pathname: `/view`,
                  state: { res },
                }}
                className="info-block">
                <span className="info-block__title">
                  {res.title} <span>| {res.subjtitle}</span>
                </span>

                <span className="info-block__content">
                  {
                    <Markup
                      content={
                        res.content.length > 300
                          ? res.content.substring(0, 300) + '...'
                          : res.content
                      }
                    />
                  }
                </span>
                <span className="info-block__date">{publicDate.locale('ru').format('lll')}</span>
                <span className="info-block__date info-block__date_deadline">
                  сдать до {deadline.locale('ru').format('lll')}
                </span>
              </Link>
            </div>
          );
        })}
      </div>
    );
  }
}

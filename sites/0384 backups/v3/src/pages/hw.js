import React from 'react';
import axios from 'axios';
import { Markup } from 'interweave';
import { Link } from 'react-router-dom';

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
      console.log(resp);
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
        {this.state.hw.map((res, index) => (
          <Link
            to={{
              pathname: `/view`,
              state: { res },
            }}
            className="info-block"
            key={index}>
            <span className="info-block__title">
              {res.title} <span>| {res.subjtitle}</span>
            </span>

            <span className="info-block__content">
              {
                <Markup
                  content={
                    res.content.length > 300 ? res.content.substring(0, 300) + '...' : res.content
                  }
                />
              }
            </span>
            <span className="info-block__date">{res.date}</span>
          </Link>
        ))}
      </div>
    );
  }
}

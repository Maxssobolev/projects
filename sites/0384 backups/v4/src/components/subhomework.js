import React from 'react';
import axios from 'axios';
import { Collapse } from 'react-bootstrap';
import { Markup } from 'interweave';
import { Link } from 'react-router-dom';

export default class Subhomework extends React.Component {
  constructor(props) {
    super(props);
    this.subject_id = this.props.subject_id;

    this.state = {
      open: false,
      hw: [],
      last: '',
    };
  }
  componentDidMount() {
    const apiUrl = `/api/subjecthomework/?id=${this.subject_id}`;
    axios.get(apiUrl).then((resp) => {
      if (resp.data.length > 0) {
        this.setState({
          hw: resp.data,
          last: resp.data[0].date,
        });
      }
    });
  }

  render() {
    return (
      <div className="page-subdirect__hwBlock">
        {this.state.hw.length > 0 && (
          <button
            onClick={() => this.setState({ open: !this.state.open })}
            aria-controls="collapsed-block"
            aria-expanded={this.state.open}>
            Домашнее задание
            <span>последнее от {this.state.last}</span>
          </button>
        )}
        <Collapse in={this.state.open}>
          <div id="collapsed-block">
            {this.state.hw.map((res, index) => (
              <Link
                to={{
                  pathname: `/view`,
                  state: { res },
                }}
                className="info-block"
                key={index}>
                <span className="info-block__title">{res.title}</span>
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
                <span className="info-block__date">{res.date}</span>
              </Link>
            ))}
          </div>
        </Collapse>
      </div>
    );
  }
}

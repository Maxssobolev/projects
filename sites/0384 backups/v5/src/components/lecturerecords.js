import React from 'react';
import axios from 'axios';
import { Collapse, Col } from 'react-bootstrap';

import clip from '../assets/img/enlace.svg';

export default class LectureRecords extends React.Component {
  constructor(props) {
    super(props);
    this.subject_id = this.props.subject_id;

    this.state = {
      open: false,
      lectories: [],
    };
  }

  componentDidMount() {
    const apiUrl = `/api/subjectlectories/?id=${this.subject_id}`;
    axios.get(apiUrl).then((resp) => {
      if (resp.data.length > 0) {
        this.setState({
          lectories: resp.data,
        });
      }
    });
  }

  render() {
    return (
      <div className="page-subdirect__lectorBlock">
        {this.state.lectories.length > 0 && (
          <button
            onClick={() => this.setState({ open: !this.state.open })}
            aria-controls="collapsed-block2"
            aria-expanded={this.state.open}>
            Записи лекций
          </button>
        )}

        <Collapse in={this.state.open}>
          <div id="collapsed-block2">
            <div className="wrapper">
              {this.state.lectories.map((res, index) => {
                if (res.type === 'youtube') {
                  //В Бд нужно только ID видео на youtube
                  return (
                    <Col key={index}>
                      <div className="lec_title">{res.title}</div>
                      <iframe
                        width={250}
                        src={`https://www.youtube.com/embed/${res.content}`}
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowFullScreen={true}></iframe>
                    </Col>
                  );
                } else if (res.type === 'onserver') {
                  return (
                    <Col key={index}>
                      <div className="lec_title">{res.title}</div>
                      <video>
                        <source src={res.content} />
                      </video>
                    </Col>
                  );
                } else if (res.type === 'link') {
                  return (
                    <Col key={index}>
                      <div className="lec_title">{res.title}</div>
                      <div>
                        <a href={res.content} target="_blank">
                          <img src={clip} width="20" /> Доступ по ссылке
                        </a>
                      </div>
                    </Col>
                  );
                } else if (res.type === 'frame') {
                  //В Бд нужно только путь из src фрейма вставить
                  return (
                    <Col key={index}>
                      <div className="lec_title">{res.title}</div>
                      <iframe
                        width={window.innerHeight / 2.5}
                        src={res.content}
                        allowFullScreen={true}></iframe>
                    </Col>
                  );
                }
              })}
            </div>
          </div>
        </Collapse>
      </div>
    );
  }
}

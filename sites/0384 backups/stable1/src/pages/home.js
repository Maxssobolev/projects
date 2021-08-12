import React from 'react';
import { Container } from 'react-bootstrap';
import { Markup } from 'interweave';

import { Link } from 'react-router-dom';
import moment from 'moment';
import 'moment/locale/ru';

import alertSound from '../assets/sounds/alert.mp3';
import fileImg from '../assets/img/file.svg';

export default class Home extends React.Component {
  constructor(props) {
    super(props);
    this.audio = new Audio(alertSound);

    this.state = {
      error: null,
      isLoaded: false,
      posts: [],
      postLastId: '',
      toChange: '',
    };
  }
  /*
  componentDidUpdate() {
    fetch('/api/home')
      .then((res) => res.json())
      .then(
        (result) => {
          if (result[0].id != this.state.postLastId) {
            document.title = 'NEW|#0384';
            this.setState({
              postLastId: result[0].id,
              isLoaded: true,
              posts: result,
              toChange: {
                id: result[0].id,
              },
            });
          } else {
            this.setState({
              isLoaded: true,
              posts: result,
            });
          }
        },
        (error) => {
          this.setState({
            isLoaded: true,
            error,
          });
        },
      );
    if (document.title == 'NEW|#0384') {
      this.audio.play();
      setTimeout(() => {
        this.audio.pause();
        document.title = '#0384';
      }, 1350);
    }
  }*/
  componentDidMount() {
    fetch('/api/home')
      .then((res) => res.json())
      .then(
        (result) => {
          this.setState({
            isLoaded: true,
            posts: result,
            postLastId: result[0].id,
          });
        },
        // Примечание: важно обрабатывать ошибки именно здесь, а не в блоке catch(),
        // чтобы не перехватывать исключения из ошибок в самих компонентах.
        (error) => {
          this.setState({
            isLoaded: true,
            error,
          });
        },
      );
  }

  render() {
    const { error, isLoaded, posts } = this.state;

    const regex = /\b(?:(?:ht|f)tp(?:s?)\:\/\/|~\/|\/)?(?:\w+:\w+@)?((?:(?:[-\w\d{1-3}]+\.)+(?:com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|edu|co\.uk|ac\.uk|it|fr|tv|museum|asia|local|travel|[a-z]{2}))|((\b25[0-5]\b|\b[2][0-4][0-9]\b|\b[0-1]?[0-9]?[0-9]\b)(\.(\b25[0-5]\b|\b[2][0-4][0-9]\b|\b[0-1]?[0-9]?[0-9]\b)){3}))(?::[\d]{1,5})?(?:(?:(?:\/(?:[-\w~!$+|.,=]|%[a-f\d]{2})+)+|\/)+|\?|#)?(?:(?:\?(?:[-\w~!$+|.,*:]|%[a-f\d{2}])+=?(?:[-\w~!$+|.,*:=]|%[a-f\d]{2})*)(?:&(?:[-\w~!$+|.,*:]|%[a-f\d{2}])+=?(?:[-\w~!$+|.,*:=]|%[a-f\d]{2})*)*)*(?:#(?:[-\w~!$ |\/.,*:;=]|%[a-f\d]{2})*)?\b/gi;

    if (error) {
      return <div>Ошибка: {error.message}</div>;
    } else if (!isLoaded) {
      return (
        <div
          style={{
            width: 'fit-content',
            margin: '0 auto',
          }}>
          Загрузка...
        </div>
      );
    } else {
      return (
        <div className="page page-home">
          <Container>
            {posts.map((res, index) => {
              let stylemap = {};
              if (this.state.toChange && this.state.toChange.id == res.id) {
                stylemap = {
                  boxShadow: '0 0 14px 0px green',
                  transition: '.7s',
                };
              }

              return (
                <Link
                  to={{
                    pathname: `/view`,
                    state: { res },
                  }}
                  className="info-block"
                  key={index}
                  style={stylemap}
                  onMouseOver={(e) => {
                    e.currentTarget.style.boxShadow = '1px 1px 3px grey';
                  }}>
                  <span className="info-block__title">{res.title}</span>
                  <span className="info-block__content">
                    <Markup
                      content={
                        res.content.length > 300
                          ? res.content
                              .replace(regex, (match) => {
                                return `<img src=${fileImg} width='50' />`;
                              })
                              .substring(0, 300) + '...'
                          : res.content.replace(regex, (match) => {
                              return `<img src=${fileImg} width='50' />`;
                            })
                      }
                    />
                  </span>
                  <span className="info-block__date">
                    {moment(res.date).locale('ru').format('lll')}
                  </span>
                </Link>
              );
            })}
          </Container>
        </div>
      );
    }
  }
}

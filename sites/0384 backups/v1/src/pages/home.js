import React from 'react';
import { Container } from 'react-bootstrap';
import { Markup } from 'interweave';

import { Link } from 'react-router-dom';

import alertSound from '../assets/sounds/alert.mp3';

export default class Home extends React.Component {
  constructor(props) {
    super(props);
    this._isMounted = false;
    this.audio = new Audio(alertSound);
    this.state = {
      error: null,
      isLoaded: false,
      posts: [],
      postLastId: '',
    };
  }

  componentDidMount() {
    this._isMounted = true;

    fetch('/api/home')
      .then((res) => res.json())
      .then(
        (result) => {
          if (this._isMounted) {
            this.setState({
              isLoaded: true,
              posts: result,
              postLastId: result[0].id,
            });
          }
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
  componentDidUpdate() {
    fetch('/api/home')
      .then((res) => res.json())
      .then(
        (result) => {
          if (result[0].id != this.state.postLastId) {
            this.audio.play();
            document.title = 'NEW|#0384';
            this.setState({
              postLastId: this.state.postLastId + 1,
              postNewestId: result[0].id,
              isLoaded: true,
              posts: result,
            });
          } else {
            this.setState({
              isLoaded: true,
              posts: result,
            });
          }
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
            {posts.map((res, index) => (
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
          </Container>
        </div>
      );
    }
  }

  componentWillUnmount() {
    this._isMounted = false;
  }
}

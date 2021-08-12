import React from 'react';
import { Container } from 'react-bootstrap';
import { Markup } from 'interweave';

import { Link } from 'react-router-dom';

import alertSound from '../assets/sounds/alert.mp3';

export default class Home extends React.Component {
  constructor(props) {
    super(props);
    this.audio = new Audio(alertSound);
    this.state = {
      error: null,
      isLoaded: false,
      posts: [],
    };

    this.getPosts = () => {
      fetch('/api/home')
        .then((res) => res.json())
        .then(
          (result) => {
            this.setState({
              isLoaded: true,
              posts: result,
            });
          },
          (error) => {
            this.setState({
              isLoaded: true,
              error,
            });
          },
        );
    };
  }

  componentDidUpdate() {
    this.getPosts();
  }
  componentDidMount() {
    this.getPosts();
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
}

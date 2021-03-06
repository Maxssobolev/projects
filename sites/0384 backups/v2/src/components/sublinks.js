import React from 'react';
import axios from 'axios';
import { Collapse } from 'react-bootstrap';
export default class Sublinks extends React.Component {
  constructor(props) {
    super(props);
    this.subject_id = this.props.subject_id;

    this.state = {
      open: false,
      links: [],
    };
  }
  componentDidMount() {
    const apiUrl = `/api/subjectlinks/?id=${this.subject_id}`;
    axios.get(apiUrl).then((resp) => {
      this.setState({
        links: resp.data,
      });
    });
  }

  render() {
    return (
      <div className="page-subdirect__linksBlock">
        {this.state.links.length > 0 && (
          <button
            onClick={() => this.setState({ open: !this.state.open })}
            aria-controls="collapsed-block3"
            aria-expanded={this.state.open}>
            Полезные ссылки
          </button>
        )}
        <Collapse in={this.state.open}>
          <div id="collapsed-block3">
            <ol>
              {this.state.links.map((el, i) => (
                <li key={i}>
                  <a href={el.href} target="_blank">
                    {el.title}
                  </a>
                </li>
              ))}
            </ol>
          </div>
        </Collapse>
      </div>
    );
  }
}

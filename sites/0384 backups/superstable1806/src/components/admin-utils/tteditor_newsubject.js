import React from 'react';
import { Button } from 'react-bootstrap';

export default class Subject extends React.Component {
  constructor(props) {
    super(props);
    this.servermessage = React.createRef();
    this.handleInputChange = this.handleInputChange.bind(this);
    this.handleDelete = this.handleDelete.bind(this);
  }

  handleInputChange(event) {
    const target = event.target;
    const value = target.value;
    const name = target.name;

    this.setState({
      [name]: value,
    });
  }

  handleSubmit(event, id) {
    const name = event.target.name;
    const value = event.target.value;
    let sended_data = {};

    if (id != 'new') {
      sended_data = {
        id,
        name,
        value,
        weekday: this.state.weekday,
      };
    } else {
      sended_data = {
        id,
        start: this.state.start,
        name: this.state.name,
        link: this.state.link,
        weekday: this.state.weekday,
      };
    }
    let apiUrl = '/timetable/create';
    async function postData(data = {}) {
      const response = await fetch(apiUrl, {
        method: 'POST', // или 'PUT'
        body: JSON.stringify(data), // данные могут быть 'строкой' или {объектом}!
        headers: {
          'Content-Type': 'application/json',
        },
      });

      return await response.json();
    }
    postData(sended_data).then((resp) => {
      this.servermessage.current.style.display = 'block';

      setTimeout(() => {
        this.servermessage.current.style.display = 'none';
      }, 2500);
    });
  }

  handleDelete(id, name) {
    const sended_data = {
      id_toDelete: id,
      table: 'timetable',
    };

    let proof = window.confirm('Удалить предмет ' + name + '?');

    async function postData(data = {}) {
      const response = await fetch('/delete', {
        method: 'POST', // или 'PUT'
        body: JSON.stringify(data), // данные могут быть 'строкой' или {объектом}!
        headers: {
          'Content-Type': 'application/json',
        },
      });

      return await response.json();
    }
    if (proof) {
      postData(sended_data).then(() => {
        this.setState({ ...this.reload });
      });
    }

    proof = false;
  }

  render() {
    const id = this.state.id;

    return (
      <tr className="subject">
        <td style={{ position: 'relative' }}>
          <div
            ref={this.servermessage}
            style={{
              display: 'none',
              position: 'absolute',
              left: '-20px',
              top: '3px',
              color: 'green',
            }}>
            ✔
          </div>
          {index + 1}
        </td>
        <td>
          <input
            type="text"
            value={this.state.start}
            name="start"
            onChange={this.handleInputChange}
          />
        </td>
        <td>
          <input
            type="text"
            name="name"
            value={this.state.name}
            onChange={this.handleInputChange}
          />
        </td>
        <td>
          <input
            type="text"
            name="link"
            onChange={this.handleInputChange}
            value={this.state.link}
          />
        </td>
        <td>
          <Button variant="primary" onClick={() => this.handleSubmit(event, id)}>
            Сохранить
          </Button>
        </td>
      </tr>
    );
  }
}

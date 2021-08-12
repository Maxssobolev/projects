import React from 'react';
import moment from 'moment'

export default class MainPosts extends React.Component {
  constructor(props) {
    super(props);
    this.state = { value: '' };

    this.handleInputChange = this.handleInputChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleInputChange(event) {
    const target = event.target;
    const value = target.value;
    const name = target.name;

    this.setState({
      [name]: value,
    });
  }

  handleSubmit(event) {
    event.preventDefault();

    const sended_data = {
      title: this.state.main_title,
      content: this.state.main_content,
      author: 'Максим',
      date: moment().format("YYYY-MMMM-DDDD HH:mm:ss")
    };

    async function postData(data = {}) {
      const response = await fetch('/main_post/new', {
        method: 'POST', // или 'PUT'
        body: JSON.stringify(data), // данные могут быть 'строкой' или {объектом}!
        headers: {
          'Content-Type': 'application/json',
        },
      });

      return await response.json();
    }

    postData(sended_data);
  }

  render() {
    return (
      <div className="main_post_create">
        {/* Добавление записей на главную страницу "Главная" */}
        <h2>Записи на главной</h2>

        <form onSubmit={this.handleSubmit} method="POST">
          <input
            type="text"
            onChange={this.handleInputChange}
            name="main_title"
            placeholder="Название"
          />

          <textarea
            id="froala-editor"
            name="main_content"
            cols="30"
            rows="10"
            onChange={this.handleInputChange}
            placeholder="Контент"></textarea>

          

          <input type="submit" value="Отправить" />
        </form>
      </div>
    );
  }
}

//

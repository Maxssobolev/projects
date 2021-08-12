import React from 'react';
import moment from 'moment';
import { CKEditor } from '@ckeditor/ckeditor5-react';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default class HomeWork extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      data: '',
      curr_subject: 1,
      subjects: [],

      postInfo: [],
    };

    this.handleChange = this.handleChange.bind(this);
    this.onEditorChange = this.onEditorChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleInputChange = this.handleInputChange.bind(this);
  }

  onEditorChange(evt) {
    this.setState({
      data: evt.editor.getData(),
    });
  }

  handleChange(changeEvent) {
    this.setState({
      data: changeEvent.target.value,
    });
  }

  handleSubmit(event) {
    event.preventDefault();

    const sended_data = {
      postId: this.props.postId,
      title: this.state.main_title,
      subject: parseInt(this.state.subject),
      content: this.state.data,
      deadline: this.state.deadline,
    };
    console.log(sended_data);
    async function postData(data = {}) {
      const response = await fetch('/homework/update', {
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

  handleInputChange(event) {
    const target = event.target;
    const value = target.value;
    const name = target.name;

    this.setState({
      [name]: value,
    });
  }

  componentDidMount() {
    let store = [];
    fetch('/api/subjects')
      .then((res) => res.json())
      .then(
        (result) => {
          store.push(result);
          fetch('/api/homework?id=' + this.props.postId)
            .then((res2) => res2.json())
            .then((result2) => {
              store.push(result2);
              console.log(store);
              this.setState({
                subjects: store[0],
                main_title: store[1][0].title,
                data: store[1][0].content,
                postInfo: store[1],
                curr_subject: store[1][0].subject_id,
              });
            });
        },
        (error) => {
          this.setState({
            error,
          });
        },
      );
  }

  render() {
    return (
      <div className="homework_create">
        <h2>Редактирование домашней работы</h2>

        <form onSubmit={this.handleSubmit} method="POST">
          <select name="subject" onChange={this.handleInputChange}>
            {this.state.subjects.map((res, index) => {
              return (
                <option
                  value={res.id}
                  {...(res.id == this.state.curr_subject ? { selected: true } : {})}>
                  {res.title}
                </option>
              );
            })}
          </select>

          <input
            type="text"
            onChange={this.handleInputChange}
            name="main_title"
            placeholder="Название"
            value={this.state.main_title}
          />
          <CKEditor
            editor={ClassicEditor}
            data={this.state.data}
            onChange={(event, editor) => {
              this.setState({
                data: editor.getData(),
              });
            }}
          />
          <p>
            Дедлайн:
            <input type="datetime-local" name="deadline" onChange={this.handleInputChange} />
          </p>

          <input type="submit" value="Отправить" />
        </form>
      </div>
    );
  }
}

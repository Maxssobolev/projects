import React from 'react';
import { Markup } from 'interweave';
import axios from 'axios';

import breaking from '../assets/img/break.svg';

const calendar = {
  1: {
    //Monday
    '11:35': 'Программирование',
    '13:45': 'Физкультура',
    '15:40': 'Философия семинар',
    '17:20': 'Программирование лаб.',
  },
  2: {
    //Tuesday
    '13:45': 'Ин. яз',
    '15:40': 'Информатика лаб.',
    '17:20': 'Мат. Анализ пр.',
  },
  Wed: {
    //Wednesday
    '13:45': 'Информатика',
    '15:40': 'АиГ',
  },
  Thu: {
    //Thusday
    '11:35': 'Философия (нч) / Аиг (ч)',
    '13:45': 'АиГ',
    '17:20': 'Доп. Физика (Кузьмина)',
  },
  5: {
    //Friday
    '09:40': 'Доп. Мат. (Сучков)',
    '11:35': 'Доп. Мат. (Сучков)',
    '13:45': 'Физкультура',
    '13:45': 'Мат. Анализ',
    '13:45': 'Физика пр. (нч) / Физика лаб. (ч)',
  },
};

export default class Calendar extends React.Component {
  constructor(props) {
    super(props);
    this.getDate = (string) => new Date(0, 0, 0, string.split(':')[0], string.split(':')[1]);
    this.state = {
      prevSub: '',
      currentSub: '',
      nextSub: '',
      time: Date.now(),
      calendar: [],
    };
  }

  componentDidMount() {
    var options = { weekday: 'short', hour: '2-digit', minute: '2-digit', hour12: false };
    var prnDt = new Date().toLocaleTimeString('en-us', options);
    const [weekday, nowTime] = prnDt.split(' ');

    const apiUrl = `/api/timetable/?day=${weekday}`;
    axios.get(apiUrl).then((resp) => {
      if (resp.data.length > 0) {
        this.setState({
          calendar: resp.data,
        });
      }
    });

    let prevSub = '';
    let currentSub = '';
    let nextSub = '';

    let paraStart = '';

    for (let time in calendar[weekday]) {
      let s = new Date().setHours(time.split(':')[0], time.split(':')[1]);
      let e = s - new Date().setHours('1', '35');

      let start = new Date(s).toLocaleTimeString('en-us', {
        hour: '2-digit',
        minute: '2-digit',
        hour12: false,
      });

      let end = new Date(e).toLocaleTimeString('en-us', {
        hour: '2-digit',
        minute: '2-digit',
        hour12: false,
      });

      if (end < nowTime) {
        prevSub = { start: start, end: end, name: calendar[weekday][time] };
      }
      if (start <= nowTime && nowTime <= end) {
        currentSub = { start: start, end: end, name: calendar[weekday][time] };
      }
      if (nowTime < start) {
        nextSub = { start: start, end: end, name: calendar[weekday][time] };
        paraStart = start;
      }
    }
    let different = this.getDate(paraStart) - this.getDate(nowTime);
    let hours = Math.floor((different % 86400000) / 3600000);
    let minutes = Math.round(((different % 86400000) % 3600000) / 60000);
    let result = (hours ? hours + ' ч ' : '') + minutes + ' мин';

    this.setState({
      prevSub: prevSub ? prevSub : '',
      currentSub: currentSub
        ? currentSub
        : {
            breaktime: result,
            name: `перерыв <img src=${breaking} width='20' style='margin-bottom:5px'>`,
          },
      nextSub: nextSub ? nextSub : '',
    });
  }

  componentDidUpdate() {
    setInterval(() => {
      var options = { weekday: 'short', hour: '2-digit', minute: '2-digit', hour12: false };
      var prnDt = new Date().toLocaleTimeString('en-us', options);
      const [weekday, nowTime] = prnDt.split(' ');

      let prevSub = '';
      let currentSub = '';
      let nextSub = '';

      let paraStart = '';
      for (let time in calendar[weekday]) {
        let s = new Date().setHours(time.split(':')[0], time.split(':')[1]);
        let e = s - new Date().setHours('1', '35');

        let start = new Date(s).toLocaleTimeString('en-us', {
          hour: '2-digit',
          minute: '2-digit',
          hour12: false,
        });

        let end = new Date(e).toLocaleTimeString('en-us', {
          hour: '2-digit',
          minute: '2-digit',
          hour12: false,
        });
        if (end < nowTime) {
          prevSub = { start: start, end: end, name: calendar[weekday][time] };
        }
        if (start <= nowTime && nowTime <= end) {
          currentSub = { start: start, end: end, name: calendar[weekday][time] };
        }
        if (nowTime < start) {
          nextSub = { start: start, end: end, name: calendar[weekday][time] };
          paraStart = start;
        }
      }
      let different = this.getDate(paraStart) - this.getDate(nowTime);
      let hours = Math.floor((different % 86400000) / 3600000);
      let minutes = Math.round(((different % 86400000) % 3600000) / 60000);
      let result = (hours ? hours + ' ч ' : '') + minutes + ' мин';

      this.setState({
        prevSub: prevSub ? prevSub : '',
        currentSub: currentSub
          ? currentSub
          : {
              breaktime: result,
              name: `перерыв <img src=${breaking} width='20' style='margin-bottom:5px'>`,
            },
        nextSub: nextSub ? nextSub : '',
      });
    }, 1000 * 60);
  }

  componentWillUnmount() {
    clearInterval(this.interval);
  }

  render() {
    return (
      <div className="calendar" timeNow={this.state.time}>
        {this.state.prevSub && (
          <div className="prevSub">
            <span className="time">
              {this.state.prevSub.start} - {this.state.prevSub.end}
            </span>

            <span className="name">{this.state.prevSub.name}</span>
          </div>
        )}
        {this.state.currentSub && (
          <div className="currentSub">
            <span className="time">
              {this.state.currentSub.start &&
                `
              ${this.state.currentSub.start} - ${this.state.currentSub.end}`}
              {this.state.currentSub.breaktime && this.state.currentSub.breaktime}
            </span>
            <span className="name">
              <Markup content={this.state.currentSub.name} />
            </span>
          </div>
        )}
        {this.state.nextSub && (
          <div className="nextSub">
            <span className="time">
              {this.state.nextSub.start} - {this.state.nextSub.end}
            </span>
            <span className="name">{this.state.nextSub.name}</span>
          </div>
        )}
      </div>
    );
  }
}

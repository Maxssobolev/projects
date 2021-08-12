import React from 'react';
import axios from 'axios';
import { usePromiseTracker } from 'react-promise-tracker';
import { trackPromise } from 'react-promise-tracker';
import { Table } from 'react-bootstrap';
import Loader from 'react-loader-spinner';
import Subject from './tteditor__subject';
import AddRow from './tteditor__addRow';
const LoadingIndicator = () => {
  const { promiseInProgress } = usePromiseTracker();

  return (
    promiseInProgress && (
      <div
        style={{
          width: '100%',
          height: '100',
          display: 'flex',
          justifyContent: 'center',
          alignItems: 'center',
        }}>
        <Loader type="ThreeDots" color="#2BAD60" height="100" width="100" />
      </div>
    )
  );
};

export default class TTEDITOR extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      calendar: [],
      weekday: 'Mon',
      weekNames: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      wholeWeek: [
        {
          Mon: 'Понедельник',
          Tue: 'Вторник',
          Wed: 'Среда',
          Thu: 'Четверг',
          Fri: 'Пятница',
          Sat: 'Суббота',
        },
      ],
    };

    this.handleSelectChange = this.handleSelectChange.bind(this);

    //  this.handleChange = this.handleChange.bind(this);
  }

  handleSelectChange(event) {
    const target = event.target;
    const value = target.value;
    const name = target.name;
    if (name == 'weekday') {
      const apiUrl = `/api/timetable/?day=${value}`;
      trackPromise(
        axios.get(apiUrl).then((resp) => {
          this.setState({ calendar: resp.data.rows, weekday: value });
        }),
      );
    }
  }

  componentDidMount() {
    const apiUrl = `/api/timetable/?day=${this.state.weekday}`;
    axios.get(apiUrl).then((resp) => {
      this.setState({
        calendar: resp.data.rows,
      });
    });
  }

  render() {
    return (
      <div className="time-table-edit">
        <select name="weekday" onChange={this.handleSelectChange}>
          {this.state.weekNames.map((day, index) => {
            return (
              <option value={day} key={index}>
                {this.state.wholeWeek[0][day]}
              </option>
            );
          })}
        </select>
        <LoadingIndicator />
        <div className="dayTable">
          <Table striped bordered hover>
            <thead>
              <tr>
                <th>№ пары</th>
                <th title="Например, 9:00">Начало</th>
                <th>Название</th>
                <th title="Необязательно">Ссылка*</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              {this.state.calendar.map((day, index) => {
                return <Subject subInfo={day} key={day.id} idx={index} />;
              })}
            </tbody>
            <tfoot>
              <AddRow weekday={this.state.weekday} />
            </tfoot>
          </Table>
        </div>
      </div>
    );
  }
}

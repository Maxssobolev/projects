import React, { useState } from 'react';
import { Button } from 'react-bootstrap';
import NewSubject from './tteditor__newsubject';

export default function addRow({ weekday }) {
  const [row, setRow] = useState({ start: '', name: '', link: '' });
  const [count, setCount] = useState([]);

  return (
    <>
      {count.map((el, index) => (
        <NewSubject />
      ))}
      <tr>
        <td colSpan={5}>
          <Button
            variant="primary"
            className="addRow"
            onClick={() => {
              setCount([...count, 1]);
            }}>
            Добавить предмет
          </Button>
        </td>
      </tr>
    </>
  );
}

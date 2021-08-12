import React from 'react';
import { useLocation } from 'react-router';
import { Markup } from 'interweave';
import { useState, useEffect } from 'react';

export default function Subdirect(props) {
  const location = useLocation();
  const just_subject = location.state.res;
  const [data, setData] = useState({});

  useEffect(() => {
    async function fetchData(id) {
      const res = await fetch(`/api/subjectlinks/?id=${id}`);
      res.json().then((res) => setData(res));
    }

    fetchData(just_subject.id);
  });

  return (
    <div className="page page-subdirect">
      <div className="title">{just_subject.title}</div>
      {setTimeout(() => {
        Object.keys(data).map((record, i) => {
          <div>{data[record].content}</div>;
        });
      }, 500)}
    </div>
  );
}

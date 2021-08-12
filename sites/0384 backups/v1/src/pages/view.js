import React from 'react';
import { useLocation } from 'react-router';
import { Markup } from 'interweave';

export default function View(props) {
  const location = useLocation();
  const post = location.state.res;

  return (
    <div className="page page-view">
      <div className="title">{post.title}</div>
      <div className="date">{post.date}</div>
      <div className="content">{<Markup content={post.content} />}</div>
    </div>
  );
}

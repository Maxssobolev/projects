import React from 'react';
import { useLocation } from 'react-router';
import { Markup } from 'interweave';
import moment from 'moment';
import 'moment/locale/ru';

import fileImg from '../assets/img/file.svg';

export default function View(props) {
  const location = useLocation();
  const post = location.state.res;
  const regex = /\b(?:(?:ht|f)tp(?:s?)\:\/\/|~\/|\/)?(?:\w+:\w+@)?((?:(?:[-\w\d{1-3}]+\.)+(?:com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|edu|co\.uk|ac\.uk|it|fr|tv|museum|asia|local|travel|[a-z]{2}))|((\b25[0-5]\b|\b[2][0-4][0-9]\b|\b[0-1]?[0-9]?[0-9]\b)(\.(\b25[0-5]\b|\b[2][0-4][0-9]\b|\b[0-1]?[0-9]?[0-9]\b)){3}))(?::[\d]{1,5})?(?:(?:(?:\/(?:[-\w~!$+|.,=]|%[a-f\d]{2})+)+|\/)+|\?|#)?(?:(?:\?(?:[-\w~!$+|.,*:]|%[a-f\d{2}])+=?(?:[-\w~!$+|.,*:=]|%[a-f\d]{2})*)(?:&(?:[-\w~!$+|.,*:]|%[a-f\d{2}])+=?(?:[-\w~!$+|.,*:=]|%[a-f\d]{2})*)*)*(?:#(?:[-\w~!$ |\/.,*:;=]|%[a-f\d]{2})*)?\b/gi;

  const replacedContent = post.content.replace(regex, (match) => {
    console.log(match);
    return `
    <a href=${match} target='_blank'>
        <img src=${fileImg} width='50' />
      </a>`;
  });

  return (
    <div className="page page-view">
      <div className="title">{post.title}</div>
      <div className="date">{moment(post.date).format('lll')}</div>
      <div className="content">{<Markup content={replacedContent} />}</div>
    </div>
  );
}

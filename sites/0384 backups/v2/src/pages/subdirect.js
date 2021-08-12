import React, { useState } from 'react';
import { useLocation } from 'react-router';
import Sublinks from '../components/sublinks';
import Subhomework from '../components/subhomework';
import LectureRecords from '../components/lecturerecords';
export default function Subdirect(props) {
  const location = useLocation();
  const just_subject = location.state.res;

  return (
    <div className="page page-subdirect">
      <div className="title">{just_subject.title}</div>
      <LectureRecords subject_id={just_subject.id} />
      <Subhomework subject_id={just_subject.id} />
      <Sublinks subject_id={just_subject.id} />
    </div>
  );
}

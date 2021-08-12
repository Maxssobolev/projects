import React from 'react';
import MainPosts from '../components/admin-utils/main_posts';

export default class Admin extends React.Component {
  render() {
    return (
      <div className="page page-admin">
        <MainPosts />
      </div>
    );
  }
}

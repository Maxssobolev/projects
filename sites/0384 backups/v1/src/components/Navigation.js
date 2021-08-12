import React from 'react';
import { NavLink } from 'react-router-dom';

const navLinks = [
  {
    title: 'главная',
    path: '/home',
  },
  {
    title: 'предметы',
    path: '/directions',
  },
  {
    title: 'домашка',
    path: '/hw',
  },
  {
    title: 'прочее',
    path: '/other',
  },
];

export default class Navigation extends React.Component {
  render() {
    return (
      <nav className="site-navigation">
        <span> #0384</span>
        <ul>
          {navLinks.map((link, index) => (
            <li key={index}>
              <NavLink to={link.path} activeClassName="menu_active">
                {' '}
                {link.title}{' '}
              </NavLink>
            </li>
          ))}
        </ul>
      </nav>
    );
  }
}

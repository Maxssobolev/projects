import React from 'react';
import MainPosts from '../components/admin-utils/main_posts';
import HomeWork from '../components/admin-utils/homework';
import HWEDITOR from '../components/admin-utils/hweditor';
import HOMEDITOR from '../components/admin-utils/homeditor';
import TTEDITOR from '../components/admin-utils/tteditor';
import { Tab, Tabs } from 'react-bootstrap';
import { useLocation } from 'react-router-dom';
import { Alert } from 'react-bootstrap';

export default function Admin() {
  const data = useLocation();
  const isAdmin = data?.state?.isAdmin;
  const isAction = data?.state?.action;
  const postType = data?.state?.postType;
  return (
    <div className="page page-admin">
      {isAdmin ? (
        <Tabs
          {...(isAction == 'edit'
            ? { defaultActiveKey: 'editPost' }
            : { defaultActiveKey: 'addHome' })}
          transition={false}
          id="noanim-tab-example">
          <Tab eventKey="addHome" title="Добавить на главную">
            <MainPosts />
          </Tab>
          <Tab eventKey="addHW" title="Добавить ДЗ">
            <HomeWork />
          </Tab>
          <Tab eventKey="TimeTable" title="Расписание">
            <TTEDITOR />
          </Tab>
          <Tab
            eventKey="editPost"
            title="Редактирование записи"
            {...(isAction == 'edit' ? {} : { disabled: true })}>
            {/*Два типа постов  - hw и post, на странице домашки и на главной странице соответственно*/}
            {postType == 'hw' ? (
              <HWEDITOR postId={data.state.postId} />
            ) : (
              <HOMEDITOR postId={data.state.postId} />
            )}
          </Tab>
        </Tabs>
      ) : (
        <Alert variant="warning">
          Панель администратора доступна только из личного кабинета старосты
        </Alert>
      )}
    </div>
  );
}

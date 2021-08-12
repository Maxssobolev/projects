export const LOGIN_REQUEST = 'LOGIN_REQUEST';
export const LOGIN_SUCCESS = 'LOGIN_SUCCESS';
export const LOGIN_FAIL = 'LOGIN_FAIL';

import { cookies } from '../index.js';

export function handleLogin() {
  return function (dispatch) {
    dispatch({
      type: LOGIN_REQUEST,
    });

    //eslint-disable-next-line no-undef
    VK.Auth.login((r) => {
      if (r.session) {
        let userData = r.session.user;

        fetch(`/users/login?id=${userData.id}`)
          .then((response) => {
            return response.json();
          })
          .then((data) => {
            VK.Api.call(
              'users.get',
              { user_ids: userData.id, fields: 'photo_max', v: 5.52 },
              (r) => {
                let photo = r.response[0].photo_max;
                cookies.set('userData', { ...userData, ...data, photo }, { path: '/' });

                dispatch({
                  type: LOGIN_SUCCESS,
                  payload: { ...userData, photo },
                });
              },
            );
          });
      } else {
        dispatch({
          type: LOGIN_FAIL,
          error: true,
          payload: new Error('Ошибка авторизации'),
        });
      }
    }, 4); // запрос прав на доступ к photo
  };
}

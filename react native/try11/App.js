import { StatusBar } from 'expo-status-bar';
import React, { useState } from 'react';
import { StyleSheet, Text, View } from 'react-native';

import { Navbar } from './src/Navbar'
import { AddTodo } from './src/AddTodo'


export default function App() {
  const [todos, setTodos] = useState([])
  const addTodo = (title) => {
    setTodos(prev => [
      ...prev,
      {
        id: Date.now().toString,
        title
      }
    ])

  }
  return (
    <View style={styles.container}>
      <Navbar title="Todo App" />
      <View style={styles.todoWrapper}>
        <AddTodo onSubmit={addTodo} />
      </View>
      <StatusBar style="auto" />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {

  },
  todoWrapper: {
    paddingHorizontal: 30,
    paddingVertical: 20
  }
});

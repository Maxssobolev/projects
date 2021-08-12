import React from 'react'
import { View, StyleSheet, TextInput, Button } from 'react-native'

export const AddTodo = ({ onSubmit }) => {
    const pressHandler = () => {
        onSubmit('TestTodo')
    }
    return (
        <View style={styles.block}>
            <TextInput style={styles.input} />
            <Button title="Добавить" style={styles.button} onPress={pressHandler} />
        </View>
    )
}

const styles = StyleSheet.create({
    block: {
        flexDirection: 'row',
        justifyContent: 'space-between'
    },
    input: {
        width: '70%',
        borderStyle: 'solid',
        borderWidth: 1,
        borderColor: '#3929ab',
    },
    button: {

    }
})
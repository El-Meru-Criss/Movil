import { Text, View, StyleSheet, Button } from 'react-native';
import React, { useEffect, useState } from 'react';



const ClientesScreen = () => {
  const [clientes, setClientes] = useState([]);

  useEffect(() => {
    const obtenerClientes = async () => {
      try {
        const response = await fetch('http://localhost/proyectos/API/mostrar.php');
        const data = await response.json();
        setClientes(data);
      } catch (error) {
        console.log(error);
      }
    };

    obtenerClientes();
  }, []);

  return (
    <View style={styles.container}>
      <View style={styles.fixToText}>

      
      {clientes.map((cliente, index) => (
        <Button style={styles.botones} key={index} title={cliente.nombre}/>
      ))}

      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
  fixToText: {
    justifyContent: 'space-between',
    width: 300,
  },
  botones: {
    margin: 100,
    padding: 100
  }
});

export default ClientesScreen;

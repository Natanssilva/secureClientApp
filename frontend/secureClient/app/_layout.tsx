import "@/global.css";
import { View, Text, StyleSheet } from 'react-native';
import 'react-native-reanimated';


export default function Layout() {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Bem-vindo ao SecureClient</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#f0f0f0',
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    color: '#333',
  },
});
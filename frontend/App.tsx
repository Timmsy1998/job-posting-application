import React from 'react';
import { Provider as PaperProvider } from 'react-native-paper';
import { Provider as ReduxProvider } from 'react-redux';
import { NavigationContainer } from '@react-navigation/native';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import theme from '@config/theme';
import store from './src/store';

const Tab = createBottomTabNavigator();

const App: React.FC = () => {
  return (
    <ReduxProvider store={store}>
      <PaperProvider theme={theme}>
        <NavigationContainer>
          <Tab.Navigator
            screenOptions={({ route }) => ({
              tabBarLabel: route.name === 'JobList' ? 'Job List' : 'Add Job',
            })}
          >
          </Tab.Navigator>
        </NavigationContainer>
      </PaperProvider>
    </ReduxProvider>
  );
};

export default App;

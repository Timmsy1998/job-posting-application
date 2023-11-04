import { createStore, applyMiddleware, combineReducers } from 'redux';
import { Provider } from 'react-redux';
import thunk from 'redux-thunk';
import rootReducer from './reducers';

const middleware = [thunk];

const store = createStore(rootReducer, applyMiddleware(...middleware));

export default store;
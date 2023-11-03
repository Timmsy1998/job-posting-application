import { combineReducers } from 'redux';
import jobPostingsReducer from './jobPostingsReducer';

const rootReducer = combineReducers({
  jobPostings: jobPostingsReducer,
});

export default rootReducer;

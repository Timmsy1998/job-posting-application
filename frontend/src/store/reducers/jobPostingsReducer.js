import { SET_JOB_POSTINGS } from '../actions/jobPostingsActions';

const initialState = {
  jobPostings: [],
};

const jobPostingsReducer = (state = initialState, action) => {
  switch (action.type) {
    case SET_JOB_POSTINGS:
      return {
        ...state,
        jobPostings: action.payload,
      };
    default:
      return state;
  }
};

export default jobPostingsReducer;
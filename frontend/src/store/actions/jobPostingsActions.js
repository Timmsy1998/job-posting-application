export const SET_JOB_POSTINGS = 'SET_JOB_POSTINGS';

export const setJobPostings = (jobPostings) => {
  return {
    type: SET_JOB_POSTINGS,
    payload: jobPostings,
  };
};
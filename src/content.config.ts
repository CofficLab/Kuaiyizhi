import { makeBlogCollection, makeMetaCollection, makeLessonCollection, makeExperimentCollection, makeCourseCollection } from '@coffic/cosy-ui/collection';

export const collections = {
	blogs: makeBlogCollection('./content/blogs'),
	meta: makeMetaCollection('./content/meta'),
	courses: makeCourseCollection('./content/courses'),
	lessons: makeLessonCollection('./content/lessons'),
	experiments: makeExperimentCollection('./content/experiments'),
};

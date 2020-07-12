const postcss = require('gulp-postcss');
const concat = require('gulp-concat');
const uglifycss = require('gulp-uglifycss');
const gulp = require('gulp');

gulp.task(`css`, function () {
	return gulp.src(`./src/**/*.css`)
		.pipe(postcss())
		.pipe(concat({ path: 'main.css', stat: { mode: 0666 }}))
		.pipe(uglifycss({ uglyComments: true}))
		.pipe(gulp.dest(`./dist/css/`))
		;
});

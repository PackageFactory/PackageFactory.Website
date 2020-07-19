const { exec } = require('child_process');

const postcss = require('gulp-postcss');
const concat = require('gulp-concat');
const uglifycss = require('gulp-uglifycss');
const livereload = require('gulp-livereload');
const gulp = require('gulp');

const tailwindConfig = require('./tailwind.config');

gulp.task(`css`, function buildCss() {
	let pipeline = gulp.src(`./src/**/*.css`)
		.pipe(postcss())
		.pipe(concat({ path: 'main.css', stat: { mode: 0666 }}));

	if (process.env.NODE_ENV === 'production') {
		pipeline = pipeline.pipe(uglifycss({ uglyComments: true}));
	}

	pipeline = pipeline
		.pipe(gulp.dest(`./dist/css/`))
		.pipe(livereload());

	return pipeline;	
});

gulp.task('ssg', function buildSite(cb) {
	exec('./vendor/bin/kristlbol generate', cb);
});

gulp.task(`watch`, function () {
	exec('php -S 0.0.0.0:8080 -t dist/');
	livereload.listen();

	gulp.watch([
		...tailwindConfig.purge,
		'./src/**/*.css'
	], gulp.parallel(['css', 'ssg']));
});

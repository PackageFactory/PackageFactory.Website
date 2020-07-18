build::
	@rm -rf dist
	@NODE_ENV=production ./node_modules/.bin/gulp css
	@vendor/bin/kristlbol generate
	@php -S 0.0.0.0:8080 -t dist/
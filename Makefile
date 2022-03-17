install:
	composer install
brain-games:
	./bin/brain-games
validate:
	composer validate
lint:
	composer run-script phpcs -- --standard=PSR2 src bin
brain-even:
	./bin/brain-even
brain-calc:
	./bin/brain-calc
brain-gcd:
	./bin/brain-gcd
	
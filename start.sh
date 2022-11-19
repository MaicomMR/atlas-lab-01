echo "\e[1;42m ■ Building docker... \e[0m"
docker-compose up -d
# docker-compose build --no-cache -d

echo "\e[1;42m ■ Creating .env \e[0m"
cp src/.env.example src/.env || echo "\e[1;41m FAIL \e[0m"

echo "\e[1;42m ■ Installing back-end dependencies \e[0m"
docker exec -it atlas-lab composer install

echo "\e[1;42m ■ Artisan key:generate \e[0m"
docker exec -it atlas-lab php artisan key:generate || echo "\e[1;41m FAIL \e[0m"

echo "\e[1;42m ■ Migrate database \e[0m"
docker exec -it atlas-lab php artisan migrate || echo "\e[1;41m FAIL \e[0m"

echo "\e[1;42m ■ Installing front-end dependencies \e[0m"
docker exec -it atlas-lab npm install

echo "\e[1;42m ■ Compile frontend files \e[0m"
docker exec -it atlas-lab npm run dev || echo "\e[1;41m FAIL \e[0m"

echo ""
echo "\e[1;42m ╔═════════════════╗ \e[0m"
echo "\e[1;42m ║      DONE       ║ \e[0m"
echo "\e[1;42m ╚═════════════════╝ \e[0m"
docker run --name postgres -e POSTGRES_PASSWORD=password -d -p 5432:5432 mdillon/postgis
sleep 5
docker run -it --link postgres:postgres --rm postgres \
    sh -c 'PGPASSWORD=password createdb -h "$POSTGRES_PORT_5432_TCP_ADDR" -p "$POSTGRES_PORT_5432_TCP_PORT" -U postgres -w app'
docker run -it --link postgres:postgres --rm postgres \
    sh -c 'PGPASSWORD=password exec psql -h "$POSTGRES_PORT_5432_TCP_ADDR" -p "$POSTGRES_PORT_5432_TCP_PORT" -U postgres -w -d app -c "CREATE EXTENSION postgis; CREATE EXTENSION postgis_topology;"'

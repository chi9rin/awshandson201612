#!/bin/sh

echo "DROP DATABASE ${1};"
echo "CREATE DATABASE ${1};"
echo "CREATE TABLE ${1}.data (name VARCHAR(32), value int);"
echo "INSERT INTO ${1}.data VALUES ('counter', 0);"


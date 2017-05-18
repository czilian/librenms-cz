<<<<<<< HEAD
#!/bin/bash
=======
#!/usr/bin/env bash
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
GH_REPO="@github.com/librenms-docs/librenms-docs.github.io.git"
FULL_REPO="https://${GH_TOKEN}$GH_REPO"
THEME_REPO="https://github.com/librenms-docs/librenms_theme.git"

<<<<<<< HEAD
=======
pip install --user 'jinja2<2.9'
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
pip install --user mkdocs
pip install --user pymdown-extensions
pip install --user git+git://github.com/aleray/mdx_del_ins.git

mkdir -p out

cd out

git init
git remote add origin $FULL_REPO
git fetch
git config user.name "librenms-docs"
git config user.email "travis@librenms.org"
git checkout master

cd ../

git clone $THEME_REPO

mkdocs build --clean

cd out

touch .
git add -A .
git commit -m "GH-Pages update by travis after $TRAVIS_COMMIT"
git push -q origin master 

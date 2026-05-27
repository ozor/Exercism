#!/usr/bin/env bash

main () {
  if (( $# >= 1 ))
  then
    NAME=$1
  else
    NAME="you"
  fi

  printf "One for %s, one for me." "$NAME"
}

main "$@"
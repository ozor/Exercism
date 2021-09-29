#!/usr/bin/env bash

main () {
  if (( $# >= 1 ))
  then
    name=$1
  else
    name="you"
  fi

  printf "One for %s, one for me.\n" "$name"
}

main "$@"
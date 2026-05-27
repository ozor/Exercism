#!/usr/bin/env bash

main () {
  if (( $# >= 1 ))
  then
    [[ $1 == '' ]] && name="you" || name=$1
  else
    name="you"
  fi

  printf "One for %s, one for me.\n" "$name"
}

main "$@"
#!/bin/bash
generate_discount_code() {
    username="$1"
    ticket_id="$2"
    discount_code=$(echo -n "$username$ticket_id" | md5sum | cut -d ' ' -f1)
    echo "$discount_code"
}
verify_login() {
    pass=$(cat /root/.cred)
    read -s -p "Enter user password: " input

    if [[ $pass == $input ]]; then
        echo "Password confirmed!"
    else
        echo "Password confirmation failed!"
        exit 1
    fi
}
main() {
    verify_login
    read -p "Enter username: " username
    read -p "Enter ticket ID: " ticket_id
    discount_code=$(generate_discount_code "$username" "$ticket_id")
    echo "Discount code for $username, Ticket ID: $ticket_id is $discount_code"
}
main

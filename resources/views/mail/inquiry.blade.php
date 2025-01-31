<section style="width: 92%; margin: 0 auto; background-color: rgb(5, 46, 5); padding: 16px;">
    <p style="font-size: 14px; color: #fff;">A new Contact inquiry received from the Mwanateknolojia Blog </p>

    <p style="color: white; margin: 4px 0"><strong>Name:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
    <p style="color: white; margin: 4px 0"><strong>Email:</strong> {{ $contact->email }}</p>
    <p style="margin: 10px 0; color: white">Message: {{ $contact->message }}</p>

</section>

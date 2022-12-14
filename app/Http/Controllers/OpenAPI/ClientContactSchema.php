<?php
/**
 * @OA\Schema(
 *   schema="ClientContact",
 *   type="object",
 *       @OA\Property(property="id", type="string", example="Opnel5aKBz", description="The hashed if of the contact"),
 *       @OA\Property(property="user_id", type="string", example="Opnel5aKBz", description="The hashed id of the user who created the contact"),
 *       @OA\Property(property="company_id", type="string", example="Opnel5aKBz", description="The hashed id of the company"),
 *       @OA\Property(property="client_id", type="string", example="Opnel5aKBz", description="The hashed id of the client"),
 *       @OA\Property(property="first_name", type="string", example="John", description="The first name of the contact"),
 *       @OA\Property(property="last_name", type="string", example="Doe", description="The last name of the contact"),
 *       @OA\Property(property="phone", type="string", example="555-152-4524", description="The phone number of the contact"),
 *       @OA\Property(property="custom_value1", type="string", example="", description="A Custom field value"),
 *       @OA\Property(property="custom_value2", type="string", example="", description="A Custom field value"),
 *       @OA\Property(property="custom_value3", type="string", example="", description="A Custom field value"),
 *       @OA\Property(property="custom_value4", type="string", example="", description="A Custom field value"),
 *       @OA\Property(property="email", type="string", example="", description="The email of the contact"),
 *       @OA\Property(property="accepted_terms_version", type="string", example="A long set of ToS", description="The terms of service which the contact has accpeted"),
 *       @OA\Property(property="password", type="string", example="*****", description="The hashed password of the contact"),
 *       @OA\Property(property="confirmation-code", type="string", example="333-sdjkh34gbasd", description="The confirmation code used to authenticate the contacts email address"),
 *       @OA\Property(property="token", type="string", example="333-sdjkh34gbasd", description="A uuid based token."),
 *       @OA\Property(property="is_primary", type="boolean", example=true, description="Defines is this contact is the primary contact for the client"),
 *       @OA\Property(property="confirmed", type="boolean", example=true, description="Boolean value confirms the user has confirmed their account."),
 *       @OA\Property(property="is_locked", type="boolean", example=true, description="Boolean value defines if the contact has been locked out."),
 *       @OA\Property(property="send_email", type="boolean", example=true, description="Boolean value determines is this contact should receive emails"),
 *       @OA\Property(property="failed_logins", type="number", format="integer", example="3", description="The number of failed logins the contact has had"),
 *       @OA\Property(property="email_verified_at", type="number", format="integer", example="134341234234", description="The date which the contact confirmed their email"),
 *       @OA\Property(property="last_login", type="number", format="integer", example="134341234234", description="Timestamp"),
 *       @OA\Property(property="created_at", type="number", format="integer", example="134341234234", description="Timestamp"),
 *       @OA\Property(property="updated_at", type="number", format="integer", example="134341234234", description="Timestamp"),
 *       @OA\Property(property="deleted_at", type="number", format="integer", example="134341234234", description="Timestamp"),
 * )
 */

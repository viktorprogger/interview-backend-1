<?php

class Message {
    private string $recipient;
    private string $subject;
    private string $text;
    private string $cc = '';

    /**
     * @param string $recipient
     *
     * @return Message
     */
    public function setRecipient(string $recipient): self
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * @param string $subject
     *
     * @return Message
     */
    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @param string $text
     *
     * @return Message
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param array $cc
     *
     * @return Message
     */
    public function setCc(array $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    public function send(string $type = 'mail'): bool
    {
        if ($type === 'mail') {
            $headers = [];
            if (!empty($this->cc)) {
                $headers[] = 'Cc: birthdayarchive@example.com';
            }

            return mail($this->recipient, $this->subject, $this->text, $headers);
        } elseif ($type === 'sendpulse') {
            $client = new SendPulseClient();
            try {
                $client->sendMail($this->recipient, $this->subject, $this->text);

                return true;
            } catch (SendPulseException $exception) {
                return false;
            }
        }

        return false;
    }
}

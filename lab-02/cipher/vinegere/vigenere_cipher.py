class VigenereCipher:
    # Lớp thực hiện mã hóa và giải mã Vigenere
    
    def vigenere_encrypt(self, plain_text, key):
        # Mã hóa văn bản bằng khóa được cung cấp
        encrypted_text = ""
        key_index = 0
        for char in plain_text:
            if char.isalpha():  # Xử lý chỉ với ký tự chữ cái
                # Tính độ dịch từ ký tự khóa hiện tại
                key_shift = ord(key[key_index % len(key)].upper()) - ord('A')
                
                if char.isupper():
                    # Mã hóa chữ hoa: (vị trí + độ dịch) mod 26
                    encrypted_text += chr((ord(char) - ord('A') + key_shift) % 26 + ord('A'))
                else:
                    # Mã hóa chữ thường: giữ nguyên dạng thường
                    encrypted_text += chr((ord(char) - ord('a') + key_shift) % 26 + ord('a'))
                key_index += 1
            else:
                encrypted_text += char  # Giữ nguyên ký tự đặc biệt
        return encrypted_text

    def vigenere_decrypt(self, encrypted_text, key):
        # Giải mã văn bản bằng khóa ban đầu
        decrypted_text = ""
        key_index = 0
        for char in encrypted_text:
            if char.isalpha():  # Xử lý chỉ với ký tự chữ cái
                # Tính độ dịch ngược từ ký tự khóa
                key_shift = ord(key[key_index % len(key)].upper()) - ord('A')
                
                if char.isupper():
                    # Giải mã chữ hoa: (vị trí - độ dịch) mod 26
                    decrypted_text += chr((ord(char) - ord('A') - key_shift) % 26 + ord('A'))
                else:
                    # Giải mã chữ thường: giữ nguyên dạng thường
                    decrypted_text += chr((ord(char) - ord('a') - key_shift) % 26 + ord('a'))
                key_index += 1
            else:
                decrypted_text += char  # Giữ nguyên ký tự đặc biệt
        return decrypted_text

from cipher.caesar.alphabet import ALPHABET  

class CaesarCipher:
    def __init__(self):
        # Bảng chữ cái A-Z
        self.alphabet = ALPHABET

    def encrypt_text(self, text: str, key: int) -> str:
        alphabet_len = len(self.alphabet)  # Độ dài bảng chữ cái
        text = text.upper()               # Chuyển hết thành chữ HOA
        encrypted_text = []
        
        # Xử lý từng chữ cái:
        for letter in text:
            # 1. Tìm vị trí trong bảng chữ cái
            letter_index = self.alphabet.index(letter)
            # 2. Cộng thêm key bước
            # 3. Dùng % để xử lý khi vượt quá Z
            output_index = (letter_index + key) % alphabet_len
            output_letter = self.alphabet[output_index]
            encrypted_text.append(output_letter)
            
        return "".join(encrypted_text)    # Ghép các ký tự lại thành chuỗi


    def decrypt_text(self, text: str, key: int) -> str:
        alphabet_len = len(self.alphabet)
        text = text.upper()
        decrypted_text = []
        for letter in text:
            letter_index = self.alphabet.index(letter)
            output_index = (letter_index - key) % alphabet_len
            output_letter = self.alphabet[output_index]
            decrypted_text.append(output_letter)
        return "".join(decrypted_text)
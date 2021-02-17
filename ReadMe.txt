api-> Περιέχει το rest api. Το api δημιουργεί (είτε τοπικά είτε επικοινώντας με ενα συγκεκριμένο URL->fetch_external user), ενημερώνει, διαβάζει ξεχωριστά έναν ή όλους τους χρήστες.

class-> Περιέχει το class User για το api.

config-> Περιέχει τις ρυθμίσεις της βάσης (mySQL). host = 'localhost', database_name = 'api_data', username = 'root', password = 'root' table = 'registered'

//Table layout
# Name          Type      Collation Attributes   Null  Default  Comments Extra
1 id           int(11)                            No    None    AUTO_INCREMENT
2 firstName   varchar(50)  greek_general_ci       No    None
3 lastName    varchar(50)  greek_general_ci       No    None
4 phoneNum    varchar(10)  utf8_general_ci        No    None
5 email       varchar(60)  utf8mb4_general_ci     No    None
6 category    varchar(20)  utf8mb4_general_ci     No    None


regform-> Περιέχει το index.php που είναι η αρχική φόρμα. Εκεί ο χρήστης καλείται να εισάγει στοιχεία στα πεδία.
Περιέχει επίσης τα αρχεία style.css και το validate-form.js. Ο χρήστης αφού εισάγει έγκυρα στοιχεία και κλικάρει το κουμπί εγγραφής, θα ανακατευθυνθεί στο base.php που βρίσκεται στον φάκελο editform. Ταυτόχρονα χρησιμοποιώντας το
create.php απο τον φάκελο του api θα δημιουργήσει έναν νέο χρήστη στην βάση δεδομένων.


editform-> Περιέχει το base.php (cursor.css και rendered.js). Στην σελίδα αυτήν ο χρήστης θα μπορεί να επεξεργάζεται
τους εισηγμένους στην βάση δεδομένων χρήστες (χρησιμοποιώντας τα αρχεία create.php, delete.php, read.php, read_single.php, update.php), να αναζητήσει χρήστες, να ανακατευθυνθεί στην πρώτη φόρμα (index.php),
και να κανεί μια προσομοίωση εισαγωγής δεδομένων στην βάση σύμφωνα με την τρίτη πηγή που προτείνει η άσκηση(χρησιμοποιώντας το fetch_external_user.php).

external_api-> Περιέχει ένα php αρχείο το οποίο δημιουργεί ενα JSON string.

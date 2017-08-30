import _mysql

class Database:

	_db = None

	def __init__(self, host, user, password, database):
		self._db = _mysql.connect(host, user, password, database)

	def query(self, query):
		self._db.query(query);

		r = self._db.store_result()

		return r.fetch_row(0)

	def escapeString(self,str):
		return _mysql.escape_string(str)

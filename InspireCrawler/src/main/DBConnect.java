package main;

<<<<<<< HEAD
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import org.bson.Document;

=======
>>>>>>> branch-alief
/**
 * Connect the Mongo DB with this class
 * @author Aulia Chairunisa
 */
public class DBConnect {

    private MongoDatabase db;

    /**
     * HOST IP
     */
<<<<<<< HEAD
    private static final String HOST = "ds023520.mongolab.com";
=======
    private static final String HOST = "ds023520.mlab.com";
>>>>>>> 99b92f97dc4d4f394cfdeabba42b0fe9dd58ac01

    /**
     * HOST PORT
     */
    private static final int PORT = 23520;
<<<<<<< HEAD

    /**
     * Database's Name
     */
    private static final String DBNAME = "inspirecrawlerdb";
	
	/**
     * Collection's Name
     */
    private static final String CollectionName = "Quote";
=======
    private static final String USER = "admin";
    private static final String PASSWORD = "admin";
    /**
     * Database's Name, change it to your Database's name
     */
    private static final String DBNAME = "inspirecrawlerdb";
    /**
     * Collection's Name, change it to your collection's name
     */
    private static final String COLNAME = "Quote";
>>>>>>> 99b92f97dc4d4f394cfdeabba42b0fe9dd58ac01

    /**
     * Constructor for DBConnect that will connect to localhost
     */
    public DBConnect() {
         MongoClientURI mongoClientURI = new MongoClientURI(
                        "mongodb://"+
                            USER +
                        ":"+
                            PASSWORD +
                        "@" +
                            HOST +
                        ":" + PORT + "/" +
                        DBNAME
        );

         db = (new MongoClient(mongoClientURI)).getDatabase(DBNAME);
    }

    /**
     * Put the quote into mongodb
     * @param fullQuote the quote that want to be inputed
     */
    public void putData(Quote fullQuote) {
<<<<<<< HEAD
        MongoCollection<Document> dBCollection = db.getCollection(CollectionName);
=======
        MongoCollection<Document> dBCollection = db.getCollection(COLNAME);
>>>>>>> 99b92f97dc4d4f394cfdeabba42b0fe9dd58ac01
        dBCollection.insertOne(
                new Document("quote", fullQuote.getQuote())
                        .append("author", fullQuote.getAuthor())
                        .append("category", fullQuote.getCategory())
                        .append("language", fullQuote.getLanguage())
                        .append("source", fullQuote.getSource())
        );
    }
}

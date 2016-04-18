package main;

import com.mongodb.MongoClient;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import org.bson.Document;

/**
 * @author Aulia Chairunisa
 */
public class DBConnect {

    private MongoDatabase db;

    /**
     * HOST IP, DEFAULT "localhost"
     */
    private static final String HOST = "localhost";

    /**
     * HOST PORT, DEFAULT 27017
     */
    private static final int PORT = 27017;

    /**
     * Database's Name, DEFAULT "test"
     */
    private static final String DBNAME = "test";

    /**
     * Constructor for DBConnect that will connect to localhost
     */
    public DBConnect() {
         db = (new MongoClient(HOST, PORT)).getDatabase(DBNAME);
    }

    /**
     * Put the quote into mongodb
     * @param fullQuote the quote that want to be inputed
     */
    public void putData(Quote fullQuote) {
        MongoCollection<Document> dBCollection = db.getCollection("Restaurants");
        dBCollection.insertOne(
                new Document("quote", fullQuote.getQuote())
                        .append("author", fullQuote.getAuthor())
                        .append("category", fullQuote.getCategory())
                        .append("language", fullQuote.getLanguage())
                        .append("source", fullQuote.getSource())
        );
    }
}

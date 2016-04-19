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
     * HOST IP
     */
    private static final String HOST = "ds023520.mongolab.com";

    /**
     * HOST PORT
     */
    private static final int PORT = 23520;

    /**
     * Database's Name
     */
    private static final String DBNAME = "inspirecrawlerdb";
	
	/**
     * Collection's Name
     */
    private static final String CollectionName = "Quote";

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
        MongoCollection<Document> dBCollection = db.getCollection(CollectionName);
        dBCollection.insertOne(
                new Document("quote", fullQuote.getQuote())
                        .append("author", fullQuote.getAuthor())
                        .append("category", fullQuote.getCategory())
                        .append("language", fullQuote.getLanguage())
                        .append("source", fullQuote.getSource())
        );
    }
}
